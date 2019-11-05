<?php

namespace App\Interactions\Listing;

use App\Contracts\Repositories\Listing\ImageRepository;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Interactions\Listing\StoreImages as Contract;
use Laravel\Spark\Spark;

class StoreImages implements Contract
{
    /**
     * The image manager instance.
     *
     * @var ImageManager
     */
    protected $images;

    /**
     * Create a new interaction instance.
     *
     * @param  ImageManager  $images
     * @return void
     */
    public function __construct(ImageManager $images)
    {
        $this->images = $images;
    }

    /**
     * {@inheritdoc}
     */
    public function validator($listing, array $data)
    {
        return Validator::make($data, [
            'photos.*' => 'required|image|max:4000',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function handle($listing, array $data)
    {
        $file = $data['photo'];

        $path = $file->hashName('images/listing/' . $listing->id);

        // We will store the profile photos on the "public" disk, which is a convention
        // for where to place assets we want to be publicly accessible. Then, we can
        // grab the URL for the image to store with this user in the database row.
        $disk = Storage::disk('s3');

        $disk->put($path, $this->formatImage($file));

        $information = [
            'listing_id' => $listing->id,
            'url' => $disk->url($path),
            'path' => $path,
            'extension' => $file->getClientOriginalExtension(),
        ];

        return Spark::interact(
            ImageRepository::class.'@create', [$listing, $information]
        );
    }

    /**
     * Resize an image instance for the given file.
     *
     * @param  \SplFileInfo  $file
     * @return \Intervention\Image\Image
     */
    protected function formatImage($file)
    {
        return (string) $this->images->make($file->path())
            ->resize(1280, 960)->encode();
    }
}

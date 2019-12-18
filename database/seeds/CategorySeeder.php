<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::insert([
            'id' => 1,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Office Space',
            'name' => 'office-space',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 38">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.4 0C.634 0 0 .634 0 1.4v28c0 .766.634 1.4 1.4 1.4h16.1v2.8h-2.1c-1.54 0-2.8 1.26-2.8 2.8v1.4h21v-1.4c0-1.54-1.26-2.8-2.8-2.8h-2.1v-2.8h16.1c.766 0 1.4-.634 1.4-1.4v-28c0-.766-.634-1.4-1.4-1.4H1.4zm0 1.4h43.4v28H1.4v-28zm1.4 24.5c0-.385.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm2.1.7c0-.385.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.315.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm2.1.7c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm2.1.7c0-.385.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.315.7.7.7.385 0 .7-.315.7-.7 0-.385-.315-.7-.7-.7zm2.1.7c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm2.1.7c0-.385.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm2.1.7c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.315-.7-.7-.7zm2.1.7c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm-23.1 4.9h8.4v2.8h-8.4v-2.8zm13.3 5.6c0-.782-.618-1.4-1.4-1.4H15.4c-.782 0-1.4.618-1.4 1.4h18.2z" fill="#000" opacity=".8"/>
                        </svg>
                      ',
            'nickname' => 'office',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 2,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Retail Space',
            'name' => 'retail-space',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 43">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M5.636 0c-1.152 0-2.1.949-2.1 2.1v3.166L0 12.436V16.1c0 1.427.867 2.658 2.1 3.202V42.7h42V19.302a3.509 3.509 0 002.1-3.202v-3.664l-3.536-7.17V2.1c0-1.151-.948-2.1-2.1-2.1H5.637zm0 1.4h34.928c.394 0 .7.304.7.7v3.492l.072.147 3.464 7.025V16.1a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1h-1.4a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1h-1.4a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1H28a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1h-1.4a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1h-1.4a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1h-1.4a2.09 2.09 0 01-2.1 2.1A2.09 2.09 0 017 16.1H5.6a2.09 2.09 0 01-2.1 2.1 2.09 2.09 0 01-2.1-2.1v-3.336l3.536-7.172V2.1c0-.396.306-.7.7-.7zM5.6 4.9c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.314-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.385 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.314-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zM3.5 12.6c-.386 0-.7.315-.7.7 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.315-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.385 0 .7.315.7.7 0 .385-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.315-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm-33.6 7c-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512v21.7h21.7v-3.5a.701.701 0 01-.7-.7c0-.386.314-.7.7-.7V23.8h12.6v12.6c.386 0 .7.315.7.7 0 .386-.315.7-.7.7v3.5h4.9V19.6c-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512-1.173 0-2.163-.62-2.8-1.512-.637.891-1.627 1.512-2.8 1.512zm-.7 4.2v9.1h11.2v-9.1H8.4zm9.8 7.7v-6.3H9.8v6.3h8.4zm18.2-6.3v16.1h-9.8V25.2h9.8zm-3.5 8.75a1.05 1.05 0 112.1 0 1.05 1.05 0 01-2.1 0zM5.6 36.4c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.315-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.385 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.315-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm17.5.7c0-.386.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'retail',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 5,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Warehouse Storage Space',
            'name' => 'warehouse-storage-space',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 44">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.1 0a4.91 4.91 0 00-4.9 4.9 4.91 4.91 0 004.9 4.9A4.91 4.91 0 0014 4.9 4.91 4.91 0 009.1 0zm0 1.4a3.49 3.49 0 013.5 3.5 3.49 3.49 0 01-3.5 3.5 3.49 3.49 0 01-3.5-3.5 3.49 3.49 0 013.5-3.5zm16.8 2.8V2.1h1.4v2.1h16.1v26.6H27.3v1.184l5.305 5.849a1.4 1.4 0 11-1.04.94L27.3 34.07v1.63h-1.4v-1.72l-4.271 4.783a1.4 1.4 0 11-1.045-.932l5.316-5.956V30.8h-9.8v-1.4H42V5.6H15.4V4.2h10.5zM39.2 7c-.386 0-.7.314-.7.7 0 .386.315.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm-.7 3.5c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm-34.3.7c-2.31 0-4.2 1.89-4.2 4.2v11.55a2.46 2.46 0 002.45 2.45c.38 0 .727-.104 1.05-.262V40.95a2.46 2.46 0 002.45 2.45 2.46 2.46 0 002.45-2.45V30.8h1.4v10.15a2.46 2.46 0 002.45 2.45 2.46 2.46 0 002.45-2.45V16.1h11.55a2.46 2.46 0 002.45-2.45 2.46 2.46 0 00-2.45-2.45H10.803L9.1 14.041 7.396 11.2H4.2zm2.404 1.4H4.2a2.791 2.791 0 00-2.8 2.8v11.55c0 .588.462 1.05 1.05 1.05a1.04 1.04 0 001.05-1.05h1.4v14c0 .588.462 1.05 1.05 1.05A1.04 1.04 0 007 40.95V29.4h4.2v11.55c0 .588.462 1.05 1.05 1.05a1.04 1.04 0 001.05-1.05V14.7h12.95a1.04 1.04 0 001.05-1.05 1.04 1.04 0 00-1.05-1.05H11.597L9.1 16.759 6.604 12.6zm32.596 0c-.386 0-.7.315-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm-.7 3.5c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm-34.3 0c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm34.3 2.8c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm-34.3 0c-.386 0-.7.315-.7.7 0 .385.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm34.3 2.8c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm-34.3 0c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm34.3 2.8c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm-34.3 0c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm34.3 2.8c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'warehouse',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 7,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Car Park Space',
            'name' => 'car-park-space',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M.006 25.292C.241 11.414 11.49.202 25.368.003a26.46 26.46 0 012.81.11c11.67 1.072 21.251 10.11 23.006 21.697.077.52.138 1.035.186 1.55.442 4.805-3.933 8.7-8.659 7.727v.003l-.542-.112c-3.87-.799-7.008 2.952-5.542 6.62l.426 1.07h-.14c1.624 5.856-2.282 12.032-8.5 12.675-.906.094-1.826.14-2.758.137C11.575 51.434-.238 39.369.006 25.292zM28.031 1.667a24.945 24.945 0 00-2.644-.104C12.322 1.746 1.786 12.27 1.563 25.319 1.338 38.507 12.471 49.877 25.658 49.92c.877.003 1.743-.04 2.593-.131 5.594-.579 9.018-6.383 6.925-11.612-1.895-4.738 2.307-9.759 7.307-8.729l.542.113c3.742.77 7.142-2.255 6.794-6.057a26.774 26.774 0 00-.18-1.46C47.995 11.167 38.986 2.675 28.032 1.667zm-3.85 3.013c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-3.9.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zM23.4 8.58c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm-15.6 2.34c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm6.24.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm8.58 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-28.08 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm6.24.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm7.02 1.56c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-28.08 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm21.84 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-28.08 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm17.16 1.56c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-28.08 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm21.84 0c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.429 0 .78-.35.78-.78 0-.43-.351-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-31.2 3.9c-.43 0-.78.35-.78.78 0 .43.35.78.779.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.429 0 .78.35.78.78 0 .43-.351.78-.78.78-.43 0-.78-.35-.78-.78zm-3.901.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm-5.46 2.34c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm-5.46 2.34c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm-3.9.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm2.34 5.46c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm-3.9.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm-5.46 2.34c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm7.02 4.68a4.693 4.693 0 014.68-4.68 4.693 4.693 0 014.68 4.68 4.693 4.693 0 01-4.68 4.68 4.693 4.693 0 01-4.68-4.68zm-11.7-3.12c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78zm3.9-.78c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm13.26 3.12a3.11 3.11 0 00-3.12-3.12 3.11 3.11 0 00-3.12 3.12 3.11 3.11 0 003.12 3.12 3.11 3.11 0 003.12-3.12zm-17.94-1.56c-.43 0-.78.35-.78.78 0 .43.35.78.78.78.43 0 .78-.35.78-.78 0-.43-.35-.78-.78-.78zm2.34.78c0-.43.35-.78.78-.78.43 0 .78.35.78.78 0 .43-.35.78-.78.78-.43 0-.78-.35-.78-.78z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'carpark',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 13,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Studio Space For Hire',
            'name' => 'studio-space-for-hire',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 38">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M20.286 1.559A3.5 3.5 0 0123.198 0h11.004a3.5 3.5 0 012.912 1.559l2.083 3.122.268.05.044-.247a2.116 2.116 0 011.993-1.739c.14-.002.28.006.421.03l3.03.506a2.108 2.108 0 011.742 2.3l-.05.467A3.5 3.5 0 0149 9.348V34.3a3.51 3.51 0 01-3.5 3.5h-42A3.51 3.51 0 010 34.3V8.75a3.506 3.506 0 013.04-3.467l4.898-.654h.003c1.167-.156 2.198.37 2.94 1.16l7.36-1.162 2.045-3.068zM34.202 1.4H23.198c-.702 0-1.356.35-1.747.935l-2.387 3.58-8.684 1.37-.252-.364a2.076 2.076 0 00-2.004-.905l-4.9.653A2.093 2.093 0 001.4 8.75V34.3c0 1.168.932 2.1 2.1 2.1h42a2.09 2.09 0 002.1-2.1V9.349c0-1.023-.727-1.89-1.736-2.067l-7.5-1.324-2.415-3.623a2.095 2.095 0 00-1.747-.935zm7.492 2.756l3.03.503c.371.063.62.391.58.769l-.036.325-4.425-.78.044-.248a.69.69 0 01.807-.569zM16.1 20.3c0-6.95 5.65-12.6 12.6-12.6 5.74 0 10.58 3.856 12.097 9.11A3.508 3.508 0 0144.1 20.3a3.508 3.508 0 01-3.303 3.49C39.279 29.044 34.44 32.9 28.7 32.9c-6.95 0-12.6-5.65-12.6-12.6zM10.5 8.4c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm-7.35 3.15c0-1.474 1.03-2.8 2.45-2.8 1.42 0 2.45 1.326 2.45 2.8 0 1.474-1.03 2.8-2.45 2.8-1.42 0-2.45-1.326-2.45-2.8zM28.7 9.1a11.19 11.19 0 0111.2 11.2 11.19 11.19 0 01-11.2 11.2 11.19 11.19 0 01-11.2-11.2A11.19 11.19 0 0128.7 9.1zM6.65 11.55c0-.845-.539-1.4-1.05-1.4s-1.05.555-1.05 1.4c0 .845.539 1.4 1.05 1.4s1.05-.555 1.05-1.4zm3.85-.35c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm9.1 9.1c0-5.018 4.082-9.1 9.1-9.1s9.1 4.082 9.1 9.1-4.082 9.1-9.1 9.1-9.1-4.082-9.1-9.1zm9.1-7.7c4.26 0 7.7 3.44 7.7 7.7S32.96 28 28.7 28a7.69 7.69 0 01-7.7-7.7c0-4.26 3.44-7.7 7.7-7.7zM9.8 14.7c0-.385.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm.7 2.1c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm32.2 3.5c0-.987-.667-1.797-1.578-2.026.107.659.178 1.334.178 2.026 0 .692-.071 1.367-.178 2.026A2.079 2.079 0 0042.7 20.3zm-32.2-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm-.7 3.5c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .385-.314.7-.7.7a.701.701 0 01-.7-.7zm.7 2.1c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.385-.314-.7-.7-.7zm-.7 3.5c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm.7 2.1c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm-.7 3.5c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'status' => 1,
            'nickname' => 'studio',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 14,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Meeting Room For Hire',
            'name' => 'meeting-room-for-hire',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 44">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M10.492 0a4.911 4.911 0 00-4.9 4.9c0 2.699 2.204 4.9 4.9 4.9a4.91 4.91 0 004.9-4.9 4.91 4.91 0 00-4.9-4.9zM38.5 0a4.91 4.91 0 00-4.9 4.9 4.91 4.91 0 004.9 4.9 4.91 4.91 0 004.9-4.9A4.91 4.91 0 0038.5 0zM13.992 4.9a3.49 3.49 0 00-3.5-3.5 3.491 3.491 0 00-3.5 3.5c0 1.941 1.561 3.5 3.5 3.5a3.49 3.49 0 003.5-3.5zM38.5 1.4A3.49 3.49 0 0142 4.9a3.49 3.49 0 01-3.5 3.5A3.49 3.49 0 0135 4.9a3.49 3.49 0 013.5-3.5zM5.726 12.184c1.099-.555 2.789-.984 5.466-.984 4.014 0 5.814 3.049 6.53 4.262l.043.072.017.025 3.248 5.025 2.735 1.294 3.458-1.958 3.46-6.456-.011.025c.664-1.373 2.087-1.736 2.23-1.773l.009-.002.005-.002c.108-.038 1.45-.512 4.184-.512 2.57 0 4.204.47 5.005.7l.029.008c1.091.312 1.832 1.173 2.223 1.917l.326.617 2.99 5.656v.002c.274.523.302 1.14.07 1.685l-2.957 6.989c-.081.188-.235.302-.39.417-.075.055-.15.11-.217.174l1.444.615h-3.068l.717 10.762a2.505 2.505 0 01-2.489 2.658h-.038a2.501 2.501 0 01-2.466-2.122l-1.354-9.034-.44 8.785a2.507 2.507 0 01-2.491 2.371 2.503 2.503 0 01-2.494-2.494v-19.02l-.949 1.334-5.504 3.096-.055-.099c-.527.345-1.162.47-1.794.219l-.013-.008-5.406-2.472-1.63-2.034.643 18.973v.011A2.5 2.5 0 0114.3 43.4a2.504 2.504 0 01-2.491-2.365l-.438-8.29-1.356 8.533h-.003A2.501 2.501 0 017.547 43.4H7.51a2.505 2.505 0 01-2.488-2.658l-.003.011.536-10.751c-.861.032-1.692-.394-2.048-1.228L.55 21.784A1.966 1.966 0 01.623 20.1v-.002c.23-.436.553-1.052.91-1.734h.001c.884-1.689 1.981-3.782 2.412-4.553.186-.333.68-1.069 1.78-1.627zm5.466.416c3.237 0 4.522 2.196 5.267 3.469.041.07.081.139.12.203l.005.011 3.486 5.395 4.222 1.999.02.008a.77.77 0 01.429 1.02v.003a.779.779 0 01-.25.312l-.133.073.008.011a.766.766 0 01-.64.033l-5.064-2.316-3.423-4.271a.694.694 0 00-.982-.11.698.698 0 00-.11.985l.564.703a.783.783 0 00-.017.194l.698 20.584A1.08 1.08 0 0114.3 42c-.59 0-1.064-.451-1.091-1.04l-.654-12.26h-1.96L8.63 41.068v.002c-.082.539-.534.93-1.083.93H7.51a1.082 1.082 0 01-1.09-1.168v-.005L7 29.148l-.008-12.132-2.705 4.432 1.236 3.577a.581.581 0 00.074.156l.003 3.505a.762.762 0 01-.804-.462l-2.959-6.983h.003a.579.579 0 01.02-.49c.277-.524.688-1.307 1.131-2.15v-.002h.001v-.001c.848-1.614 1.81-3.447 2.176-4.106.134-.241.353-.635 1.19-1.058.839-.424 2.307-.834 4.834-.834zm30.506.639c-.815-.235-2.215-.639-4.598-.639-2.608 0-3.651.403-3.716.428l-.003.001-.044.017-.043.01s-1.006.304-1.365 1.042l-.002.014-3.665 6.828-2.99 1.692c.486.345.8.873.89 1.45l3.432-1.928 3.306-4.665v23.417c0 .613.481 1.094 1.094 1.094.59 0 1.063-.451 1.093-1.04L35.733 28h1.969l1.96 13.07c.082.539.536.93 1.083.93h.038c.643 0 1.135-.525 1.091-1.168l-.768-11.53a2.183 2.183 0 01-.334-2.243l-.005.009.216-.523-.044-.005.361-2.136v-6.88l3.262 4.034-2.502 6.048-.003.003a.774.774 0 00.413 1.028.773.773 0 001.028-.41l2.956-6.986a.569.569 0 00-.022-.49c-.45-.854-1.36-2.575-2.116-4.005l-.002-.004-1.196-2.264c-.224-.423-.858-1.08-1.37-1.224l-.05-.015zM42.7 21.48l.252.31-.252.604v-.914zM0 33.6c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm14 .7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.315-.7.7 0 .386.315.7.7.7.385 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm16.1-.7c-.386 0-.7.315-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'meeting',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 16,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Commercial Kitchen',
            'name' => 'commercial-kitchen',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 45">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 10.035L22.4.64l21.97 9.215.43.18V14h-2.1v30.8H2.1V14H0v-3.965zm43.4.93l-21-8.805-21 8.805V12.6h1.892l.263-.309.065-.027.24-.055.575.257.137.61-.405.476-.065.03-.241.054-.361-.161V43.4h37.8V13.54l-.602.042-.065-.03-.205-.132-.219-.59.344-.525.627-.041.065.027.205.134.066.175H43.4v-1.635zM22.367 4.39l-.24.055-.063.027-.011.011h-.006l-.024.036-.367.43.14.612.213.095.118.077.065.03.044-.003.131.058.24-.055.066-.03.003-.003.142-.01.342-.526-.216-.588-.208-.134-.063-.027-.16.008-.146-.063zm-2.885 1.17l.241-.051.574.254.137.613-.407.475-.063.028-.241.054-.571-.254-.14-.612.407-.479.063-.027zm5.836 0l-.63.042-.341.525.219.588.207.136.063.028.627-.041.341-.528-.218-.588-.205-.134-.063-.027zm-8.477 1.12l.24-.056.572.255.14.612-.408.479-.063.024-.24.055-.575-.254-.139-.613.407-.478.066-.025zm11.118 0l-.626.037-.34.528.217.588.205.137.063.024.629-.04.341-.526-.218-.588-.205-.136-.066-.025zM14.197 7.795l.24-.055.572.254.14.613-.408.478-.063.025-.24.055-.575-.252-.136-.612.404-.479.066-.027zm16.406 0l-.623.04-.345.528.216.586.208.136.063.025.626-.038.345-.528-.216-.585-.208-.137-.066-.027zm-19.05 1.118l.24-.055.575.255.136.61-.407.478-.066.027-.24.055-.572-.254-.14-.613.408-.478.066-.025zm21.694 0l-.626.041-.342.525.216.588.208.134.066.027.623-.038.342-.528-.213-.588-.208-.136-.066-.025zM8.91 10.03l.24-.055.574.254.137.613-.407.478-.066.025-.24.055-.572-.255-.14-.612.41-.476.064-.027zm26.982 0l-.626.04-.342.526.216.59.208.134.066.025.623-.038.342-.525-.216-.59-.208-.135-.063-.027zM6.264 11.145l.241-.054.572.257.142.61-.408.478-.065.027-.24.055-.575-.257-.137-.61.408-.476.062-.03zm32.272 0l-.627.044-.341.525.216.588.205.134.065.027.627-.04.341-.526-.216-.588-.208-.134-.063-.03zM17.04 35V18.2h6.576c3.284 0 5.542 2.27 5.542 5.6 0 3.284-2.33 5.543-5.621 5.543h-3.892V35h-2.605zm2.605-14.495h3.287c2.292 0 3.56 1.165 3.56 3.295 0 2.084-1.315 3.248-3.56 3.248h-3.287v-6.543zM4.9 39.9c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.315.7.7.7.385 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'commercial',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 17,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Event Space',
            'name' => 'event-space',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42 42">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M21 0c-3.538 0-6.598 1.911-8.32 4.728-.917-.287-1.863-.528-2.88-.528C4.397 4.2 0 8.597 0 14c0 4.159 2.633 7.659 6.3 9.078v10.815c-.394.248-.7.612-.7 1.107v5.6c0 .766.634 1.4 1.4 1.4h28c.766 0 1.4-.634 1.4-1.4V35c0-.495-.306-.859-.7-1.107V23.078C39.367 21.66 42 18.16 42 14c0-5.403-4.397-9.8-9.8-9.8-1.017 0-1.963.24-2.88.528C27.599 1.91 24.539 0 21 0zm0 1.4a8.393 8.393 0 017.087 3.891.697.697 0 00.563.998l.036.066.572-.214A8.373 8.373 0 0132.2 5.6c4.648 0 8.4 3.752 8.4 8.4 0 3.743-2.444 6.899-5.816 7.99l-.484.158V35h.7v5.6H7V35h.7V22.148l-.484-.158C3.845 20.899 1.4 17.743 1.4 14c0-4.648 3.752-8.4 8.4-8.4.771 0 1.515.11 2.226.309a.701.701 0 101.214.675.698.698 0 00.052-.238l.022.009.29-.536A8.39 8.39 0 0121 1.4zm4.271 5.671a.698.698 0 01.99 0 .7.7 0 11-.99 0zM11.9 9.1c-.386 0-.7.314-.7.7 0 .385.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm11.246 1.148a.697.697 0 01.662-.432.74.74 0 01.255.052c.355.15.524.558.377.916a.699.699 0 11-1.294-.536zM12.6 12.581a.701.701 0 10.263 1.348.7.7 0 00-.263-1.348zM14.7 23.1c0-.386.315-.7.7-.7.386 0 .7.315.7.7 0 .385-.315.7-.7.7a.701.701 0 01-.7-.7zm11.9-.7c-.386 0-.7.315-.7.7 0 .385.315.7.7.7.385 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm-11.9 3.5c0-.385.315-.7.7-.7.386 0 .7.315.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm11.9-.7c-.386 0-.7.315-.7.7 0 .386.315.7.7.7.385 0 .7-.315.7-.7 0-.385-.315-.7-.7-.7zm-11.9 3.5c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm11.9-.7c-.386 0-.7.314-.7.7 0 .386.315.7.7.7.385 0 .7-.314.7-.7 0-.386-.315-.7-.7-.7zM9.1 34.3c0-.386.314-.7.7-.7.385 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.385 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.385 0-.7.314-.7.7 0 .386.315.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'event',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        \App\Category::insert([
            'id' => 19,
            'section_id' => 1,
            'metric_id' => 1,
            'title' => 'Shoot location',
            'name' => 'shoot-location',
            'icon' => '<svg class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45 42">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0v8.4h1.4V42h42V8.4h1.4V0H0zm1.4 1.4h42V7h-42V1.4zm40.6 7H2.8v32.2H42V8.4zm-25.2 2.8c-1.151 0-2.1.949-2.1 2.1v.7h.293c.309.774.926 1.4 1.807 1.4H28c.88 0 1.498-.626 1.807-1.4h.293v-.7c0-1.151-.949-2.1-2.1-2.1H16.8zM28 12.6H16.8c-.396 0-.7.303-.7.7 0 .396.303.7.7.7H28c.396 0 .7-.303.7-.7 0-.397-.303-.7-.7-.7zm-1.4 18.2h2.1v4.9h1.4v-4.9h2.1L29.4 28l-2.8 2.8zm6.3 0l2.8-2.8 2.8 2.8h-2.1v4.9H35v-4.9h-2.1zM7 37.1c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.385 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.315-.7-.7-.7zm2.1.7c0-.386.315-.7.7-.7.386 0 .7.314.7.7 0 .386-.315.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1.7c0-.386.314-.7.7-.7.386 0 .7.314.7.7 0 .386-.314.7-.7.7a.701.701 0 01-.7-.7zm3.5-.7c-.386 0-.7.314-.7.7 0 .386.314.7.7.7.386 0 .7-.315.7-.7 0-.386-.314-.7-.7-.7zm2.1 1.4v-1.4h12.6v1.4H25.9z" fill="#000" opacity=".8"/>
                       </svg>
                      ',
            'nickname' => 'shoot',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

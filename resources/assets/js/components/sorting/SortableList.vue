<script>
import {Sortable, Plugins} from '@shopify/draggable';

function move(items, oldIndex, newIndex) {
    const itemRemovedArray = [
        ...items.slice(0, oldIndex),
        ...items.slice(oldIndex + 1, items.length)
    ];

    return [
        ...itemRemovedArray.slice(0, newIndex),
        items[oldIndex],
        ...itemRemovedArray.slice(newIndex, itemRemovedArray.length)
    ]
}

export default {
    props: {
        value: {
            required: true
        },
        itemClass: {
            default: 'sortable-item'
        },
    },
    provide() {
        return {
            itemClass: this.itemClass
        }
    },
    render() {
        return this.$scopedSlots.default({
            items: this.value,
        })
    },
    mounted() {
        const sortable = new Sortable(this.$el, {
            draggable: `.${this.itemClass}.draggable`,
            mirror: {
                constrainDimensions: true,
            },
            plugins: [Plugins.ResizeMirror]
        })
        .on('sortable:stop', ({ oldIndex, newIndex }) => {
            this.$emit('input', move(this.value, oldIndex, newIndex))
            this.$emit('updateImageOrder');
        });

        this.$on('hook:destroyed', () => {
            sortable.destroy()
        });
    }
}
</script>

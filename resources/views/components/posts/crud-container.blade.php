<div
    x-data="{
        openCreateUpdateModal: false,
        openDeleteModal: false,
        selectedPostId: null,
        selectedPostTitle: '',
        isLoading: false,
    }"
    x-on:close-create-update-modal="openCreateUpdateModal = false"
    x-on:close-delete-modal="openDeleteModal = false"
    class="w-full max-w-360 m-auto flex flex-col items-center p-4"
>
    <div x-show="openCreateUpdateModal">
        <livewire:posts.create-update :channel="$channel" />
    </div>

    <div x-show="openDeleteModal">
        <livewire:posts.delete :channel="$channel" />
    </div>

    <div class="w-full">

        <x-layout.notification :channel="$channel" />

        {{ $header ?? NULL }}

        <x-posts.crud-list :posts="$posts" />

    </div>
</div>

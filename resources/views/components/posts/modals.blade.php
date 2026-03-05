<div>
    <div x-show="openCreateUpdateModal">
        <livewire:posts.create-update channel="home" />
    </div>

    <div x-show="openDeleteModal">
        <livewire:posts.delete channel="home" />
    </div>
</div>

<div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50" x-on:click="openCreateUpdateModal = false; openDeleteModal = false">
    <div class="bg-white p-6 rounded shadow-lg w-96" x-on:click.stop>
        {{ $slot }}
    </div>
</div>

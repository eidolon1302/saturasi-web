<x-app-layout>
    <div class="relative flex h-full" x-data="{ inboxSidebarOpen: true }">

        <!-- Inbox sidebar -->
        <x-inbox.inbox-sidebar />

        <!-- Inbox body -->
        <x-inbox.inbox-body />

    </div>
</x-app-layout>

<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6 p-4">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Departments</h1>

        <div class="overflow-x-auto rounded-lg border border-neutral-200 dark:border-neutral-700 bg-white dark:bg-neutral-800 shadow">
            <!-- Header -->
            <div class="flex items-center justify-between px-4 py-3 border-b border-neutral-200 dark:border-neutral-700">
                <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Manage Departments</h2>
                <button wire:click="create"
                    class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow hover:bg-indigo-700 focus:ring focus:ring-indigo-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Department
                </button>
            </div>

            <!-- Flash Message -->
            @if (session()->has('message'))
                <div class="px-4 py-2 text-sm text-green-700 bg-green-100 border-b border-green-300">
                    {{ session('message') }}
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-neutral-700">
                        <tr>
                            <th class="px-4 py-2">SL No.</th>
                            <th class="px-4 py-2">Department Name</th>
                            <th class="px-4 py-2 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Departments as $index => $department)
                            <tr class="border-t border-neutral-200 dark:border-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-700/50">
                                <td class="px-4 py-2">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 font-medium">{{ $department->name }}</td>
                                <td class="px-4 py-2 text-right space-x-2">
                                    <button wire:click="edit({{ $department->id }})"
                                        class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-lg hover:bg-yellow-200">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $department->id }})"
                                        class="px-3 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-lg hover:bg-red-200">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                    No departments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ open: @entangle('modalOpen') }">
        <div x-show="open" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
            <div class="w-full max-w-md bg-white dark:bg-neutral-800 rounded-xl shadow-lg p-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ $updateMode ? 'Edit Department' : 'Add Department' }}
                </h3>

                <form wire:submit.prevent="{{ $updateMode ? 'update' : 'store' }}" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Department Name</label>
                        <input type="text" wire:model="name"
                            class="w-full mt-1 px-3 py-2 text-sm border rounded-lg dark:bg-neutral-700 dark:border-neutral-600 dark:text-white focus:ring focus:ring-indigo-300">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-2">
                        <button type="button" @click="open = false"
                            class="px-4 py-2 text-sm bg-gray-200 rounded-lg hover:bg-gray-300 dark:bg-neutral-600 dark:hover:bg-neutral-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            {{ $updateMode ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>

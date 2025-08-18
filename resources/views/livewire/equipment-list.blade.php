<x-layouts.app :title="__('Dashboard')">
    <div class="flex flex-col gap-6 p-4">
        <h1 class="text-2xl font-bold">Equipments Dashboard</h1>

        <div class="overflow-x-auto rounded-lg border border-neutral-200 dark:border-neutral-700">
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700">
                <thead class="bg-neutral-100 dark:bg-neutral-800">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">SL No.</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Equipments Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Category</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">SN No.</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Department</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">User Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Chalan Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Chalan Image</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-neutral-700 dark:text-neutral-200">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                    {{-- Dynamic rows will be inserted here --}}
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>

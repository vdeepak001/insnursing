<div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
    <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left">
            <thead>
                <tr class="bg-gradient-to-r from-impetus-teal to-impetus-orange">
                    <th class="px-6 py-4 font-outfit text-xs font-bold uppercase tracking-wider text-white">Module Name</th>
                    <th class="px-6 py-4 text-center font-outfit text-xs font-bold uppercase tracking-wider text-white">Modules Completed</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                @forelse ($moduleRows as $module)
                    <tr class="transition-colors odd:bg-white even:bg-impetus-teal-muted/50 hover:bg-brand-50/80">
                        <td class="px-6 py-4 text-sm font-medium text-gray-700 dark:text-gray-300">
                            {{ $module->name }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm font-bold text-blue-600">
                            {{ number_format($module->passed_count) }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-16 text-center text-sm text-gray-500">
                            {{ $emptyMessage }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

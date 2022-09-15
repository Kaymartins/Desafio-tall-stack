<div class="overflow-auto rounded-lg shadow">
    <div class="w-full col-span-3 mt-8">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
                {{$header ?? null}}
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                {{$body ?? null}}
            </tbody>
        </table>
    </div>
</div>

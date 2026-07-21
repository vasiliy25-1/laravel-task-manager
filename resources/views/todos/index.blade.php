<x-layout>

    <div>
        <table class="table-fixed w-full">
            <thead>
            <tr class="border-b border-b-indigo-900 text-left font-semibold italic">
                <th>Category</th>
                <th>Title</th>
                <th>Priority</th>
                <th>Due at</th>
            </tr>
            </thead>

            <tbody>
            @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->category_id }}</td>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->priority }}</td>
                    <td>{{ $todo->due_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layout>

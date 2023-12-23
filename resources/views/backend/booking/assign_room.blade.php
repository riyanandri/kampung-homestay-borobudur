<form action="" method="POST">
    @csrf

    <table class="table">
        <tr>
            <th>Nomor Kamar</th>
            <th>Aksi</th>
        </tr>

        @foreach ($room_numbers as $room_number)
            <tr>
                <td>{{ $room_number->room_number }}</td>
                <td>
                    <a href="{{ route('assign_room_store', [$booking->id, $room_number->id]) }}" class="btn bg-primary"><i
                            class="lni lni-circle-plus"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
</form>

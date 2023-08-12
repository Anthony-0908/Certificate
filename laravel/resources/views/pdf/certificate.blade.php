<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
</head>
<body>
    @foreach ($cert as $item)
        <p>{{ $item->user->first_name. ' ' . $item->user->last_name }}</p>
        <p>{{ $item->lesson->lesson }}</p>
        <p>{{ $item->lesson->time_duration }}</p>
        <p>{{ $item->lesson->speaker_name }}</p>
    @endforeach
</body>
</html>

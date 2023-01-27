<br>
<br>
<br>
<br>
    <div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Members</h3>
        <form action="{{route("saveMember")}}" method="post">
            @csrf

            <label> name : <input type="text" name="name"/> </label>
            <label> surname : <input type="text" name="surname"/> </label>
            <label> email : <input type="text" name="email"/> </label>

            <button type="submit">submit</button>
        </form>
        <h3>Meetings </h3>
        <form action="{{route("saveMeeting")}}" method="post">
            @csrf

            <label> title : <input type="text" name="title"/> </label>
            <label> location : <input type="text" name="location"/> </label>
            <label> date : <input type="datetime-local" name="date"/> </label>

            <button type="submit">submit</button>
        </form>
            <form action="{{route("saveAttendace")}}" method="post">
                @csrf
                <label>Meeting</label>
                @if(!empty($meetings))
                <select name="meetingId">
                    @foreach ($meetings as $meeting)
                        <option value="{{$meeting->id}}"> {{$meeting->title}}</option>
                    @endforeach
                </select>
                @endif
                <label>Member</label>
                @if(!empty($members))
                <select name="memberId">
                    @foreach ($members as $member)
                        <option value="{{$member->id}}"> {{$member->name}}</option>
                    @endforeach
                </select>
                @endif

                <button type="submit">submit</button>
            </form>
@if(!empty($attendances))
    <h4>Attendances of meeting with id</h4>
<ul>
    @foreach ($attendances as $a)
        <li>  {{$a->meetingId}}</li>
    @endforeach
</ul>
@endif
    </div>

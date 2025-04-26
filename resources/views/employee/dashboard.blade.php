<h1>Welcome Employee</h1>
<form method="POST" action="{{ route('employee.logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

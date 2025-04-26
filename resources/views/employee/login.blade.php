<form method="POST" action="{{ route('employee.login') }}">
    @csrf
    <input type="text" name="fullname" placeholder="Full Name" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>

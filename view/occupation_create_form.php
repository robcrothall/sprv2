<h2>Record a new Occupations</h2>

<form action="../page/occupation_create.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control'></td>
        </tr>
        <tr>
            <td>Notes on this occupation</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='../page/occupation.php' class='w3-button w3-green'>Back to Occupationss</a>
            </td>
        </tr>
    </table>
</form>



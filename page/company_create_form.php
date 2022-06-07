<h2>Record a new Company</h2>
<form action="../page/company_create.php" method="post">
<input type='submit' value='Save' class='w3-button w3-green' />
<a href='../page/company.php' class='w3-button w3-green'>Back to Companies</a>
    <table class='w3-table-all'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='co_name' class='form-control' size='50'></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type='text' name='co_address' class='form-control' size='50'></td>
        </tr>
        <tr>
            <td>Notes on this company</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"></textarea></td>
        </tr>
    </table>
<input type='submit' value='Save' class='w3-button w3-green' />
<a href='../page/company.php' class='w3-button w3-green'>Back to Companies</a>
</form>

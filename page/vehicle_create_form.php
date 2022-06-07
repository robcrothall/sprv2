<h2>Record a new Vehicle</h2>

<form action="../page/vehicle_create.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td>Registration number</td>
            <td><input type='text' name='reg_no' class='form-control'></td>
        </tr>
        <tr>
            <td>Notes on this vehicle</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='../page/vehicle.php' class='w3-button w3-green'>Back to Vehicles</a>
            </td>
        </tr>
    </table>
</form>



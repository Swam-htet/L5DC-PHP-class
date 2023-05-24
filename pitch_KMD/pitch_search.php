<?php
include './component/header.php';

?>
<form action="pitch_search_process.php" method="post">
    <div>

        <label for="type">Choose Search Type : </label>
        <select name="type" id="type">
            <option value="country">Country</option>
            <option value="pname">Pitch Name</option>
        </select>


    </div>

    <div>
        <label for="value">Search Keyword : </label>
        <input type="text" name="value" id="value">
    </div>
    <button type="submit">Search Here</button>
</form>

<?php include "./component/footer.php" ?>
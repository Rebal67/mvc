<?php require_once APPROOT . "/views/fragments/header.php"; ?>


<h2 class="mt-2">test</h2>
<table class="table shadow">
    <thead>
        <th>
            name
        </th>

        <th>
        number
        </th>

    </thead>

    <tbody>
        <?php
        foreach ($data as $row) {
            echo "<tr>";
            echo " <td> {$row->name} </td>";
            echo " <td> {$row->number} </td>";


        }

        ?>
    </tbody>
</table>


<?php require_once APPROOT . "/views/fragments/footer.php"; ?>
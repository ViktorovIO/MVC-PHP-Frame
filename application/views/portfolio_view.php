<h1>Портфолио</h1>
<p>
    <table>
        Все проекты в следующей таблице являются вымышленными,
        поэтому даже не пытайтесь перейти по приведенным ссылкам.
        <tr>
            <td>Год</td>
            <td>Проект</td>
            <td>Описание</td>

<?php

    foreach($data as $row)
    {
        echo '<tr><td>'.$row['Year'].'</td><td>'.$row['Site'].'</td><td>'.$row['Description'].'</td></tr>';
    }
?>
        </tr>
    </table>
</p>

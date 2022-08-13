<h2>Rincian Tugas</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" style="width: 30px;">No.</th>
            <th scope="col">Tugas</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1;
        foreach ($data_tugas as $tugas) : ?>
            <tr>
                <th scope="row"><?= $n++ ?></th>
                <td><?= $tugas['detail_pekerjaan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
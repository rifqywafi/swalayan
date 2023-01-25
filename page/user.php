<div class="card">
    <section id="">
        <div class="row ">
            <div class="col-12">
                <div class="card-header">
                    <h4 class="fs-2 card-title">Data User</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="actions/proses_user.php?aksi=simpan" method="POST">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm">
                                    Tambah Data
                                </button>
                                <div class="collapse mt-3" id="collapseForm">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php
                                            include 'databases/koneksi.php';
                                                $querykode = mysqli_query($koneksi, "SELECT max(id_user) as idterbesar FROM user");
                                                $data = mysqli_fetch_array($querykode);
                                                $id_user = $data['idterbesar'];
                                                $urutan = (int) substr($id_user, 3, 3);
                                                $urutan++;
                                                $huruf = "USR";
                                                $iduser = $huruf . sprintf("%03s", $urutan);
                                            ?>
                                            <input type="text" id="id_user" class="form-control" value="<?= $iduser ?>"
                                                name="id_user" hidden />
                                            <label for="nama_user">Nama User</label>
                                            <input type="text" id="nama_user" class="form-control"
                                                placeholder="Nama User" name="nama_user" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control" placeholder="Username"
                                                name="username" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" class="form-control" name="jenis_kelamin">
                                                <option value="Jenis Kelamin" selected hidden>Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" id="password" class="form-control" name="password"
                                                placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" id="no_hp" class="form-control" name="no_hp"
                                                placeholder="No. HP" />
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                        <button type="reset" onclick="btnReset()"
                                            class="btn btn-light-secondary me-1 mb-1">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-12 py-3 mt-3" style="border-top:1px dotted black;border-radius:2px;">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ID User</th>
                                            <th scope="col">Nama User</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">NO. HP</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        $sql = "SELECT * FROM `user` ORDER BY `user`.`id_user` DESC";
                        $query = mysqli_query($koneksi, $sql);
    
                        $no = 0; //variabel no
    
    
                        while ($user = mysqli_fetch_array($query)) {
    
                            $no++;
    
                            echo "<tr>";
                            echo "<th scope='row'>$no</th>";
    
                            echo "<td>" . $user['id_user'] . "</td>";
                            echo "<td>" . $user['nama_user'] . "</td>";
                            echo "<td>" . $user['username'] . "</td>";
                            echo "<td>" . $user['jenis_kelamin'] . "</td>";
                            echo "<td>" . $user['password'] . "</td>";
                            echo "<td>" . $user['no_hp'] . "</td>";
    
                            echo "<td>";
                            echo " <a href='' class='badge bg-warning text-decoration-none'  data-bs-toggle='modal' data-bs-target='#inlineForm'><span data-feather='edit'></span></a> | ";
                            echo "<a href=actions/proses_user.php?aksi=delete&id_user=" . $user['id_user'] . " class='badge bg-danger text-decoration-none' onclick='confirmDelete(event)'><span data-feather='trash-2' ></span></a>";
                            echo "</td>";
    
                            echo "</tr>";
                        }
                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<script>
    function btnReset() {
        document.getElementbyId("form").reset()
    }
</script>
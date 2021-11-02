<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM teachers WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(!$table_data){
            header('Location: /pages/teachers/index.php');
        }else{
            if (mysqli_num_rows($table_data) > 0){
                $teacher = mysqli_fetch_assoc($table_data);
            }
        }


        $sql2 = "SELECT * FROM students INNER JOIN student_teacher on students.id = student_teacher.student_id WHERE student_teacher.teacher_id = $id";
        $table_data_students = mysqli_query($database, $sql2);
       
        if (mysqli_num_rows($table_data_students) > 0){
            $students = [];
            while($table_row = mysqli_fetch_assoc($table_data_students)){
                $students[] = $table_row;
            }
        }
    }
}
?>
<?php if($teacher) : ;?>
<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Teacher <?= $id; ?></h1>
                                <a class='btn btn-primary float-end p-2 my-2' href="/pages/teachers/edit.php?id=<?= $id ?? '';?>">Edit Teacher</a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <?= $teacher['first_name'] . ' ' . $teacher['last_name']; ?>
                            </div>
                            <div class="card-body">
                                <?=$teacher['id_card'] ;?>
                                <?php if(isset($students) && count($students) > 0) : ?>
                                    <div class="card mb-4">
                                            <div class="card-header">
                                                <i class="fas fa-table me-1"></i>
                                                STUDENTS
                                            </div>
                                            <div class="card-body">
                                                <table id="datatablesSimple">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>ID CART</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>ID CART</th>
                                                            
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php if(count($students) > 0): ?>
                                                            <?php foreach ($students as $student): ?>
                                                                <tr>
                                                                    <td><?= $student['id']; ?></td>
                                                                    <td><?= $student['first_name']; ?></td>
                                                                    <td><?= $student['lastname']; ?></td>
                                                                    <td><?= $student['id_card']; ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>   
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </main>
<?php endif;?>
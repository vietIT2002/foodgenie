<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Viên</title>

    <!-- Thêm Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <?php
    include_once("./connect_db.php");
    if (!empty($_SESSION['nguoidung'])) {
        $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
        $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $totalRecords = mysqli_query($con, "SELECT * FROM `nhacungcap` WHERE `trang_thai` = 0");
        $totalRecords = $totalRecords->num_rows;
        $totalPages = ceil($totalRecords / $item_per_page);
        $nhacungcap = mysqli_query($con, "SELECT * FROM `nhacungcap`  WHERE `trang_thai` = 0 ORDER BY `id`  ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

        mysqli_close($con);
        ?>
    <div class="flex justify-between items-center">
        <div class="flex  pt-10 p pl-8">
            <p class="pb-4 pt-0 text-gray-900 text-2xl font-bold dark:text-white text-5xl"
                style="color: #0099cc !important;">
                Quản lý nhà cung cấp
            </p>

        </div>


        <div class="flex py-8 pr-6">
            <button data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal"
                class="w-40 h-16 p-2 rounded-[15px] bg-blue-500 hover:bg-blue-500 text-white text-3xl rounded-full "
                type="button">
                Thêm
            </button>

        </div>
    </div>
    <div class="card w-full m-10px border overflow-hidden divide-slate-200 bg-base-100 shadow-xl ">


        <div class=' w-full px-4 bg-base-100 divide-y divide-slate-200'>

            <div class="bg-white shadow-md rounded-lg overflow-hidden ">
                <div class="overflow-x-auto overflow-y-auto h-5/6">
                    <table class=" min-w-full bg-white   ">
                        <thead class="h-20 bg-gray-300 sticky top-0 z-10">
                            <tr>
                                <th class=" pl-8  font-normal ">Mã</th>
                                <th class="font-normal px-6 py-3">Nhà cung cấp</th>
                                <th class="font-normal px-6 py-3">Email</th>
                                <th class="font-normal px-6 py-3">Website</th>
                                <th class="font-normal px-6 py-3">SĐT</th>
                                <th class="font-normal px-6 py-3">Đặt hàng</th>
                                <th class="font-normal px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tbody class="bg-white divide-y divide-gray-200"> -->
                            <?php while ($row = mysqli_fetch_array($nhacungcap)) { ?>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            </tr>
                            <td class="px-6 py-4">NCC<?= $row['id'] ?></td>

                            <td class="px-6 py-4"><?= $row['ten_ncc'] ?></td>

                            <td class="px-6 py-4"><?= $row['email'] ?></td>
                            <td class="px-6 py-4"><?= $row['web_site'] ?></td>
                            <td class="px-6 py-4"><?= $row['phone'] ?></td>
                            <td class="px-6 py-4">
                                <a href="admin.php?act=datncc&id=<?= $row['id'] ?>" 
                                class="font-bold text-green-500 text-3xl no-underline hover:text-green-500 focus:outline-none">
                                    <i class="fa-solid fa-store"></i>
                                </a>
                            </td>
                            <!-- <td class="px-6 py-4">
                                <a href="admin.php?act=trancc&id=<?= $row['id'] ?>" class="font-bold">Trả</a>
                            </td> -->
                            <td>
                                <a href="admin.php?act=xoancc&id=<?= $row['id'] ?>"
                                    class="text-red-600 hover:text-red-800"
                                    onclick="return confirm('Bạn có muốn xóa nhà cung cấp này không' );"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Phân trang -->
            <?php include './pagination.php'; ?>
            <!-- </div> -->
        </div>
    </div>







    <?php } ?>





    <?php

    include 'nhacungcap_adding.php';
    // include 'nhanvien_editing.php';
    ?>

</body>

</html>
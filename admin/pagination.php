<div id="pagination">
    <?php
    if ($current_page > 3) {
        $first_page = 1;
    ?>
    <a class="page-item"
        href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">
        <i class="fa-solid fa-angles-left"></i>
    </a>
    <?php
    }
    if ($current_page > 1) {
        $prev_page = $current_page - 1;
    ?>
    <a class="page-item"
        href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">
        <i class="fa-solid fa-angle-left"></i>
    </a>
    <?php }
    ?>
    
    <!-- Hiển thị các số trang gần với trang hiện tại -->
    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
    <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
    <a class="page-item"
        href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
    <?php } ?>
    <?php } else { ?>
    <strong class="current-page page-item"><?= $num ?></strong>
    <?php } ?>
    <?php } ?>
    
    <?php
    if ($current_page < $totalPages - 1) {
        $next_page = $current_page + 1;
    ?>
    <a class="page-item"
        href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <?php
    }
    if ($current_page < $totalPages - 3) {
        $end_page = $totalPages;
    ?>
    <a class="page-item"
        href="admin.php?tmuc=<?= $_GET['tmuc'] ?>&per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">
        <i class="fa-solid fa-angles-right"></i>
    </a>
    <?php
    }
    ?>
</div>

<link href="../output.css" rel="stylesheet">

<script src="./javascript/card_showmore.js"></script>
<main>
    <div class="bg-gray-300  px-4 py-4 animate-fade-left animate-once animate-ease-out">
        <h1 class="text-center text-red-600 text-4xl mb-4 font-vnpro font-semibold italic">Khoá học</h1>
        <p class="text-center text-black text-xl mb-4 font-vnpro font-semibold italic">Danh sách khoá học hiện tại</p>
        <div class="flex flex-col md:grid grid-cols-2 gap-4 px-10">
            <?php

            $sql = "SELECT lophoc.ten_LopHoc, banggia.soTien, loaibanggia.ten_LBG, lichhoc.ngayHoc, lichhoc.gioHoc, lophoc.DiaChi
FROM lophoc
LEFT JOIN monhoc ON lophoc.id_MonHoc = monhoc.id_MonHoc
LEFT JOIN banggia ON monhoc.id_BangGia = banggia.id_BangGia
LEFT JOIN loaibanggia ON banggia.id_LoaiBangGia = loaibanggia.id_LBG
LEFT JOIN lichhoc ON monhoc.id_MonHoc = lichhoc.id_MonHoc";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div
                        class="bg-white border border-black p-3 flex flex-col justify-between rounded-2xl transition duration-300 ease-in-out hover:transform hover:scale-105">
                        <h2
                            class="text-center text-red-600 text-2xl mb-4 font-vnpro font-semibold italic border-black border-b-2 pb-2">
                            <?php echo $row["ten_LopHoc"]; ?>
                        </h2>
                        <div class="hidden md:block text-black text-center font-vnpro font-medium card-content">
                            <p class="m-2">Học phí: <span class="text-red-600 font-vnpro font-semibold">
                                    <?php echo number_format($row["soTien"], 0, ',', '.') . ' VND'; ?>
                                </span>

                            </p>
                            <p class="m-2">Hình thức:
                                <?php echo $row["ten_LBG"]; ?>
                            </p>
                            <p class="m-2">Ngày bắt đầu học:
                                <?php echo date("d-m-Y", strtotime($row["ngayHoc"])); ?>
                            </p>
                            <p class="m-2">Giờ học:
                                <?php echo date("H:i", strtotime($row["gioHoc"])); ?>
                            </p>
                            <p class="m-2">Địa chỉ:
                                <?php echo $row["DiaChi"]; ?>
                            </p>
                        </div>
                        <div class="md:hidden text-black text-center font-vnpro font-medium">Nhấn để biết thêm</div>

                        <a href="#get_started"
                            class="bg-red-600 text-white px-6 py-2 rounded-lg self-center mt-3 hover:underline hover:font-extrabold">Đăng
                            ký</a>

                    </div>

                    <?php
                }
            } else {
                echo "0 results";
            }

            ?>

        </div>
    </div>
</main>
<link href="../output.css" rel="stylesheet">
<?php


// Fetch class names from 'lophoc' table
$sql = "SELECT ten_LopHoc FROM lophoc";
$result = $conn->query($sql);
$class_names = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $class_names[] = $row['ten_LopHoc'];
    }
}

function getNextId($conn)
{
    $sql = "SELECT id FROM dangky ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $latestId = $row['id'];
        $numberPart = (int) substr($latestId, 2) + 1;
        $nextId = "DK" . str_pad($numberPart, 4, '0', STR_PAD_LEFT);
        return $nextId;
    } else {
        return "DK0001"; // If no records exist, start with DK0001
    }
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $class = $_POST['robotics-class'];
    $name = $_POST['name'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    // Prepare statement to retrieve ID from the lophoc table using the class name
    $getClassId = $conn->prepare("SELECT id_LopHoc FROM lophoc WHERE ten_LopHoc = ?");
    $getClassId->bind_param("s", $class);
    $getClassId->execute();
    $getClassId->store_result();

    // If the class name is found, proceed to insert data into the dangky table
    if ($getClassId->num_rows > 0) {
        $getClassId->bind_result($id_LopHoc);
        $getClassId->fetch();
        $getClassId->close();

        // Get the next ID for the dangky table
        $nextId = getNextId($conn);

        // Insert data into 'dangky' table
        $stmt = $conn->prepare("INSERT INTO dangky (id, id_LopHoc, ten, sdt, tuoi, email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nextId, $id_LopHoc, $name, $phone, $age, $email);

        // Set input values
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        // Execute the prepared statement
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();

        // Redirect or display a success message after insertion
        echo "<script>alert('Đăng ký thành công!');</script>";
    } else {
        echo "Class not found!";
    }
}

$conn->close();
?>

<main>
    <div
        class="bg-gradient-to-r from-blue-400 to-red-800 p-10 rounded-lg flex flex-row  justify-center items-center gap-x-52">
        <div class="flex flex-col gap-10 items-center mr-8">
            <img src="./images/chat.svg" alt="Chatbot Icon" class="w-10 h-10 flex content-start">
            <h2 class="text-white text-2xl mt-2">
                <span class="block font-vnpro font-semibold italic">Đăng ký khoá học</span>
                <span>để nhận trải nghiệm </span>
            </h2>
        </div>
        <form class="flex flex-col" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="robotics-class">
                    Chọn lớp học
                </label>
                <select name="robotics-class" id="robotics-class"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <!-- Here should be the options for class names -->
                    <?php foreach ($class_names as $class) { ?>
                        <option value="<?php echo $class; ?>">
                            <?php echo $class; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="name">
                    Họ và tên
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" placeholder="Họ và tên">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="email">
                    Email (tùy chọn)
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="email" name="email" type="email" placeholder="Email (optional)">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="phone">
                    Số điện thoại
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="phone" name="phone" type="text" placeholder="Số điện thoại">
            </div>
            <div class="mb-4">
                <label class="block text-white text-sm font-bold mb-2" for="age">
                    Tuổi
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="age" name="age" type="text" placeholder="Tuổi">
            </div>
            <div class="flex items-center justify-start">
                <button
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
</main>
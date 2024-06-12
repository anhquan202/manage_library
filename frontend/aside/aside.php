<aside class="library-menu">
  <h2 class="title">Dashboard</h2>
  <div id="menu-list">
    <div class="children"><a href="#dashboard">Trang chủ</a></div>
    <div class="children">
      <div class="chidren-header">
        <a href="#books">Quản lý Sách</a>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <ul class="children-books">
        <li><a href=""></a>Tác giả</li>
        <li><a href=""></a>Nhà xuất bản</li>
        <li><a href=""></a>Sách</li>
      </ul>
    </div>
    <div class="children"><a href="#members">Quản lý Thành viên</a></div>
    <div class="children"><a href="#loans">Quản lý Mượn/Trả</a></div>
    <div class="children"><a href="#reports">Báo cáo</a></div>
  </div>
  <!-- <h2>Tìm kiếm</h2>
  <form action="#search" method="get">
    <input type="text" name="query" placeholder="Tìm kiếm sách...">
    <button type="submit">Tìm kiếm</button>
  </form> -->
</aside>

<script>
    // Lắng nghe sự kiện click trên phần tử cha
    document.getElementById('menu-list').addEventListener('click', (event) => {
      // Kiểm tra nếu phần tử được click có class 'children'
      if (event.target.closest('.children')) {
        const clickedItem = event.target.closest('.children');
        
        // Loại bỏ class 'abc' khỏi tất cả các phần tử
        document.querySelectorAll('.children').forEach((item) => {
          item.classList.remove('abc');
        });
        // Thêm class 'abc' vào phần tử được click
        clickedItem.classList.add('abc');
      }
    });
  </script>
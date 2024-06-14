<aside class="library-menu">
  <h2 class="title">Dashboard</h2>
  <div id="menu-list">
    <div class="children"><a href="#dashboard">Trang chủ</a></div>
    <div class="children has-children">
      <div class="chidren-header">
        <span>Quản lý Sách</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
      <ul class="children-books">
        <li><a href="authors.php">Tác giả</a></li>
        <li><a href="publishers.php">Nhà xuất bản</a></li>
        <li><a href="books.php">Sách</a></li>
      </ul>
    </div>
    <div class="children">
      <a href="./member/member.php">Quản lý Thành viên</a>
    </div>
    <div class="children">
      <a href="loans.php">Quản lý Mượn/Trả</a>
    </div>
    <div class="children">
      <a href="reports.php">Báo cáo</a>
    </div>
  </div>
</aside>

<script>
  document.getElementById('menu-list').addEventListener('click', (event) => {
    if (event.target.closest('.children')) {
      const clickedItem = event.target.closest('.children');

      document.querySelectorAll('.children').forEach((item) => {
        item.classList.remove('active');
      });

      clickedItem.classList.add('active');
    }
  });
  const list_page = document.querySelectorAll('.children a');
  list_page.forEach((item) => {
    item.addEventListener('click', (event) => {
      event.preventDefault();
      const page = item.getAttribute('href');
      fetch(page)
        .then(res => {
          if (!res.ok) {
            throw new Error('Network response was not ok');
          }
          return res.text();
        })
        .then(data => {
          // main-content id in index.php
          console.log(data);
          document.getElementById('main-content').innerHTML = data;
        })
        .catch(error => {
          console.error('There has been a problem with your fetch operation:', error);
          document.getElementById('content').innerHTML = '<p>Đã xảy ra lỗi khi tải nội dung.</p>';
        })
    })
  })
</script>
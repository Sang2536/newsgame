# newsgame
  1. Professional internship project at university
  2. Details: https://github.com/Sang-2000/thuctapchuyenmon

# Đề tài: Xây dựng website tin tức game

# Công nghệ sử dụng
  1. Ngôn ngữ: HTML, CSS, Javascript, PHP
  2. Framework: Bootstarp
  3. Cơ sở dữ liệu: MSSQL
  4. Công nghệ sử dụng: Responsive Design Web, First Mobile

# Chức năng đã hoàn thành
  1. Đăng nhập, đăng xuất, đăng ký
  2. Sắp xép bài viết mới nhất, bài viết nhiều lượt xem nhất
  3. Tự chọn ngẫu nhiên một game, hình ảnh hiển thị
  4. Phân trang ở phía người dùng
  5. Bình luận bài viết
  6. Tự động cập nhật menu
  7. Tìm kiếm bài viết cho người dùng
  8. Thêm, xóa, sửa, tìm kiếm dữ liệu cho quản lý
  9. Deploy lên server

# Chức năng chưa hoàn thành
  1. Xác minh địa chỉ email
  2. Lấy lại mật khẩu khi người dùng quên
  3. Phân trang phía quản lý
  4. Người dùng tự đăng được bài viết và kiểm duyệt bài viết của người dùng.

# Hướng dẫn sử dụng
  1. Đăng nhập: Chỉ áp dụng đối với quản lý dữ liệu hoặc khi người dùng muốn bình luận. Khi mới truy muốn truy cập vào trang quản lý dữ liệu người dùng sẽ phải đăng nhập/ đăng ký. Sẽ có 1 form hiện lên để người dùng đăng nhập vào và sử dụng được các chức năng bên trong. Nhập thông tin tài khoản và ‘đăng nhập’. Hệ thống tiến hành so sánh với dữ liệu đã có trong database. Nếu thông tin sai sẽ hiển thị ra thông báo yêu cầu kiểm tra và nhập lại. Nếu đúng thì chuyển trang hiện tại của người dùng. Với tài khoản của người dùng sẽ trở lại trang chi tiết bài viết, bài viết sẽ là bài trước khi đăng nhập. Tài khoản quản lý sẽ vào trang quản lý, sẽ mặc định vào trang ‘danh mục bài viết’
  2. Đăng ký: Người dùng muốn bình luận bài viết nhưng chưa có tài khoản hoặc người quản lý muốn thêm tài khoản khác để quản lý. Vào trang đăng ký, nhập thông tin và nhấn xác nhận. Thông tin nhập vào chính xác và phù hợp sẽ được chuyển về trang bình luận. Nếu sai sẽ có thông báo và yêu cầu kiểm tra lại.
  3. Đăng xuất: Khi đã xong quy trình và muốn thoát, nhấn vào nút đăng xuất để thoát
  4. Tìm kiếm: Chúng ta luôn ghét việc tìm kiếm một phần nhỏ trong cả một một đống dữ liệu lớn. Sẽ rẩ mất thời gian nếu như cứ cố gắng làm điều đó. Thay vì tìm kiếm thông thường, thì khi muốn tìm thứ gì đó trong website, người dùng nhấp vào ô tìm kiếm, gõ từ khóa và nhấn để xác nhận. Tìm kiếm thành công sẽ hiện ra danh sách với từ khóa người dùng đã nhập vào. Còn nếu không có dữ liệu với từ khóa sẽ hiển thị thông báo. Nếu muốn loại bỏ danh sách tìm kiếm nữa có thể click vào mục menu nào đó, bài viết, hay tab lại trang tìm kiếm vừa rồi.
  5. Săp xếp bài viết theo ngày đăng gần nhất, theo lượt xem nhiều nhất Bài viết tự dộng sắp xếp theo ngày đăng và theo số người đọc bài viết chi tiết.
  6. Menu tự động: Khi thêm vào danh mục bài trong database thì trang hiển thị cũng sẽ tự động cập nhật lại menu. Điều hướng đến các danh mục nhỏ khác trong danh mục chưa nó.
  7. Hiển thị ngẫu nhiên game, hình ảnh: Thay vì chỉ hiển thị vài hình ảnh, game thì khi random sẽ hiển thị ngẫu nhiên hình ảnh, game có trong database.
  8. Phân trang: Khi dữ liệu trên trang hiện tại quá nhiều, tìm kiếm khó khăn và mất thời gian. Phân trang sẽ tự động thực hiện nếu như dữ liệu vượt qua số lượng cho phép ở trên một trang.
  9. Thêm, xóa, sửa, tìm kiếm
     9.1. Thêm: Click vào nút thêm, form thêm dữ liệu se hiện lên. Nhập các thành phần vào dữ liệu tương ứng và nhấn xác nhận. Dữ liệu hợp lệ sẽ được lưu vào database và trang sẽ chuyển về lại trang quản lý. - Nếu chưa có dữ liệu mà nhấn xác nhận sẽ hiện ra thông báo và không thể thực hiện được.
     9.2. Sửa: Khi muốn thay đổi dữ liệu mà không phải xóa đi thêm lại, vừa mất thời gian và gấy khó cho người dùng. Click vào sửa, trang hiện tại sẽ chuyển đén trang sửa thêm dữ liệu. Dữ liệu muốn sửa cũng sẽ có trong các trường dữ liệu. Chọn và sửa các thành phần dữ liệu muốn thay đổi tương ứng vào các trường và nhấn xác nhận. Dữ liệu hợp lệ sẽ được lưu vào database và trang sẽ chuyển về lại trang quản lý. Nếu không có thay đổi dữ liệu mà nhấn xác nhận cũng sẽ được chuyển về trang quản lý.
     9.3. Xóa:: Di chuyển đến dữ liệu muốn xóa và ấn nút xóa. - Hộp thoại thông báo xuất hiện. Chọn OK để xác nhận xóa, Canse để hủy xóa.
     9.4. Tìm kiếm: Nhập vào ô tìm kiếm và ấn nút. Nội dung tìm kiếm sẽ hiển thị ngay phía dưới thay cho dữ liệu hiển thị ban đầu.
  10. Đọc bài viết • Chọn bài viết muốn đọc, nhấn vào hình ảnh hoặc tiêu đề bài viết • Trang sẽ chuyển sang trang chi tiết tin tức, bài viết đầy đủ sẽ hiển thị tại đây • Đọc xong thì có thể chọn những bài viết khác để đọc thêm.



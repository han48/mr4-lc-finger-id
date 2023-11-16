Vấn đề:
- Website SNS mong muốn tìm một phương pháp tối ưu để truy lùng các tài khoản clone, để giải quyết vấn đề bomb review, seeding.
- Giải pháp ban đầu là đang sử dụng IP để xác nhận tài khoản clone. Tuy nhiên giải pháp này gây ra một số vấn đề trong thực tế.
    + Vì nhiều nơi sử dụng IP tĩnh, nên mặc dù là cùng IP nhưng thực tế lại là các tài khoản thật của người dùng khác nhau, việc sử dụng IP khiến cho việc xử lý clone bị sai lầm, khiến người dùng bị nhắc nhở sai, gây ảnh hưởng đến thiện cảm của người dùng đối với website.
    + Trường hợp nếu người dùng sử dụng các phần mềm để thay đổi IP, thì không thể phát hiện được clone để xử lý.

Giải pháp:
- Đối với các ứng dụng trên nền tảng desktop có thể sử dụng Hardware ID để định danh người dùng (ví dụ như các trò chơi của Blizzard sử dụng cơ chế này để banned các tài khoản sử dụng hack, vì thế người dùng khi bị phát hiện sử dụng hack không có cách nào chơi game của Blizzard trên máy tính cũ được nữa, bắt buộc phải mua máy mới hoặc sử dụng kỹ thuật cao để sửa đổi Hardware ID).

Vậy browser có Hardware ID không? Câu trả lời là có, ở browser thì sử dụng thuật ngữ là Browser fingerprint.
Các loại browser fingerprint:
- Static fingerprint: là các thông tin không thay đổi hoặc ít thay đổi theo thời gian, như địa chỉ IP, user agent, độ phân giải màn hình, ngôn ngữ, múi giờ, các plugin và phông chữ được cài đặt, v.v. Các thông tin này có thể được thu thập bằng cách sử dụng các phương thức JavaScript đơn giản hoặc các yêu cầu HTTP.
- Dynamic fingerprint: là các thông tin có thể thay đổi theo thời gian, như WebRTC, canvas, audio, v.v. Các thông tin này có thể được thu thập bằng cách sử dụng các phương thức JavaScript phức tạp hơn, như yêu cầu trình duyệt vẽ một hình ảnh hoặc phát một âm thanh và sau đó lấy mã băm của kết quả.

Việc sử dụng Static fingerprint tuy dễ dàng nhưng tính ổn định và mức độ tín nhiệm thấp.
Dynamic fingerprint với phương pháp phổ biến và mức độ tín nhiệm cao là canvas fingerprinting.

1. Canvas fingerprinting là gì?
Canvas fingerprinting là một kỹ thuật theo dõi người dùng trực tuyến bằng cách sử dụng phần tử canvas của HTML5 để tạo ra một dấu vân tay duy nhất cho mỗi trình duyệt.
Kỹ thuật này hoạt động bằng cách yêu cầu trình duyệt vẽ một hình ảnh bất kỳ trên canvas và sau đó lấy mã băm của hình ảnh đó. Mã băm này có thể được sử dụng để nhận dạng và theo dõi người dùng qua các trang web khác nhau mà không cần sử dụng cookie hay các phương tiện tương tự.
Canvas fingerprinting được coi là một kỹ thuật theo dõi khó phát hiện và khó chặn hơn so với các kỹ thuật khác.

Canvas fingerprinting dựa trên cơ sở là "Pixel Perfect: Fingerprinting Canvas in HTML5", về cơ sở thì khi sử dụng canvas đề vẽ trên HTML5, tùy thuộc vào nhiều yếu tố mà việc vẽ trên mỗi máy đều là duy nhất. Các yếu tố làm ảnh hưởng đến việc vẽ canvas bao gồm:
- Hệ điều hành (Platform - OS)
- Trình duyệt (Browser)
- Cạc đồ họa (VGA)
- Trình điều khiển cạc đồ họa (VGA driver)
Vì đặc tính kỹ thuật nên cho dù là cùng 1 nhà sản xuất, cùng 1 dòng chip, ... thì cũng không thể nào có 2 hardware giống nhau hoàn toàn, dẫn đến các hình vẽ canvas giống nhau được thực hiện trên các thiết bị giống nhhau về mặt kỹ thuật vẫn sẽ có sự sai khác nhất định. Việc này sẽ tạo ra Canvas Finger ID cho mỗi thiết bị.

Với các thông tin trên, thì việc người dùng đổi IP, xóa cookie hay thậm chí là sử dụng trình duyệt ẩn danh thì cũng sẽ không làm thay đổi Finger ID của mình.

Hạn chế:
- Nếu người dùng sử dụng các trình duyệt có tính năng chống phát hiện (ví dụ như Tor), hay sử dụng các phần mềm làm thay đổi các thông tin định danh, hay 1 số phần mềm chặn quảng cáo, thì Canvas Fingerprinting sẽ không thể lấy được Finger ID.
- Tuy nhiên các phương pháp này đều không phổ biến, nên đối với người dùng thông thường hay các hệ thống bomb review hay seeding cũng ít sử dụng. Ngoài ra cũng có thể nhận dạng các phương pháp trên để ngăn chặn người dùng sử dụng tính năng thiết yếu.

Nợi ích khác của việc "theo dõi người dùng":
- Cá nhân hóa nội dung và quảng cáo theo mục tiêu.

Vấn đề pháp lý:
- Theo quy định chung về bảo vệ dữ liệu (GDPR), thì việc lấy dấu vân tay trên trình duyệt là hợp pháp ở Châu Âu, miễn là chủ sở hữu trang web tuân thủ tất cả các quy tắc và quy định liên quan. Và việc lấy dấu vân tay trên trình duyệt là hợp pháp kể cả không có sự cho phép của người dùng (việc này trái ngược với việc sử dụng cookie). Tương tự như vậy, Mỹ cũng không có luật cấm lấy dấu vân tay trên trình duyệt ở tất cả các bang.

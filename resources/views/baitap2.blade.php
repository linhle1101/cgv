<html>
    <head>
        <title>Thêm thể loại</title>
    </head>
    <body>
       <center> <form action="{{url('themtheloai2')}}" method="post">
            <table style="text-align: center">
                <tr>
                    <td>ID</td>
                    <td>Tên thể loại</td>
                </tr>
                <tr>
                    <td><input type="number" name="id[]"></td>
                    <td><input type="text" name="theloai[]"></td>
                </tr>
                <tr>
                    <td><input type="number" name="id[]"></td>
                    <td><input type="text" name="theloai[]"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Lưu"></td>
                </tr>
            </table>
            {{ csrf_field() }}
        </form> </center>
    </body>    
</html>
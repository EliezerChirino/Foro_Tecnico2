import java.sql.*;
import com.mysql.jdbc.Driver;
public class DatabaseConnection {
    public static void main(String[] args) throws SQLException {

        Connection connection = DriverManager.getConnection("jdbc:mysql://localhost:3306/productos", "root", "");

        Statement statement = connection.createStatement();

        ResultSet resultSet = statement.executeQuery("SELECT * FROM ferreteros");

        while (resultSet.next()) {
            System.out.println(resultSet.getString("nombre"));
            System.out.println(resultSet.getString("descripcion"));
            System.out.println(resultSet.getString("codigo"));
            System.out.println(resultSet.getString("stock"));
            System.out.println(resultSet.getString("precio"));
        }
        // Close the connection
        connection.close();
    }
}

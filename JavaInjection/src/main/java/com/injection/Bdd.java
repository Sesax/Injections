package com.injection;

import java.sql.*;

public class Bdd {
    
    private Connection con;
    private Statement statement;
    private PreparedStatement statementSafe;
    private ResultSet resultSet;

    public void connection(){

        String url = "jdbc:mysql://localhost:3306/injection?ServerTimezone=UTC";
        String userName = "Miaou";
        String password = "MiaouProject";

        try {
            con = DriverManager.getConnection(url, userName, password);
            statement = con.createStatement();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    public boolean login(String login, String password){

        try {
            resultSet = statement.executeQuery("SELECT username FROM user WHERE username='"+login+"' AND password='"+password+"'");
            if (resultSet.next() == true){
                return true;
            }
            return false;
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    public boolean loginSafe(String login, String password){

        try {
            String sql = "SELECT username FROM user WHERE username=? AND password=?";
            statementSafe = con.prepareStatement(sql);
            statementSafe.setString(1, login);
            statementSafe.setString(2, password);
            statementSafe.execute();
            resultSet = statementSafe.getResultSet();
            if (resultSet.next()){
                return true;
            }
            return false;
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }
}

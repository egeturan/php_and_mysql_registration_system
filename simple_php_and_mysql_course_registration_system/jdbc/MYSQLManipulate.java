import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

public class MYSQLManipulate {
	
	  private static final String CREATE_TABLE_TABLE1="CREATE TABLE Student ("
              + "SID CHAR(12),"
              + "SNAME VARCHAR(50),"
              + "BDATE DATE,"
              + "SCITY VARCHAR(20),"
              + "YEAR CHAR(20),"
              + "GPA FLOAT,"
              + "PRIMARY KEY (SID)) ENGINE=INNODB";
	  
	  private static final String CREATE_TABLE_TABLE2="CREATE TABLE Company ("
              + "CID CHAR(8),"
              + "CNAME VARCHAR(20),"
              + "QUOTA INT,"
              + "PRIMARY KEY (CID)) ENGINE=INNODB";

	  
	  private static final String CREATE_TABLE_TABLE3="CREATE TABLE Apply ("
              + "SID CHAR(12),"
              + "CID CHAR(8),"
              + "PRIMARY KEY (SID, CID), FOREIGN KEY (SID) REFERENCES Student(SID), FOREIGN KEY (CID) REFERENCES Company(CID)) ENGINE=INNODB";


	public static void main(String[] args) {
		Connection conn = null;
		try {
		    // db parameters
		    String url       = "jdbc:mysql://dijkstra.ug.bcc.bilkent.edu.tr/ege_turan";
		    String userName      = "ege.turan";
		    String password  = "WmJbtJdT";
		    
		
		    // create a connection to the database
		    conn = DriverManager.getConnection(url, userName, password);
		   
		} catch(SQLException e) {
		   System.out.println(e.getMessage());
		} finally {
		   
		    	if(conn == null) {
		           
		    	}else {
		    		System.out.println("We are connected");
		    	}
		
		}
		
		Statement statement1 = null;
		Statement statement2 = null;
		Statement statement3 = null;
		
		try {
			statement1 = conn.createStatement();
			statement2 = conn.createStatement();
			statement3 = conn.createStatement();
			statement1.executeUpdate(CREATE_TABLE_TABLE1);
			statement2.executeUpdate(CREATE_TABLE_TABLE2);
			statement3.executeUpdate(CREATE_TABLE_TABLE3);
		} catch (SQLException e) {
			
			e.printStackTrace();
		}finally {
			 System.out.println("Table created");
			/* if (statement1 != null) {
				 try {
					statement1.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
		        }
		        if (conn != null) {
		          try {
					conn.close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
		        }*/
		}
		
		Statement[] statements = new Statement[19];
		
		for (int i = 0; i < statements.length; i++) {
			try {
				statements[i] = conn.createStatement();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
	
		try {
			
			//Insert into Company
			statements[0].executeUpdate("INSERT INTO Company " + "VALUES ('C101', 'tubitak', 2)");
			statements[1].executeUpdate("INSERT INTO Company " + "VALUES ('C102', 'aselsan', 5)");
			statements[2].executeUpdate("INSERT INTO Company " + "VALUES ('C103', 'havelsan', 3)");
			statements[3].executeUpdate("INSERT INTO Company " + "VALUES ('C104', 'microsoft', 5)");
			statements[4].executeUpdate("INSERT INTO Company " + "VALUES ('C105', 'merkez bankasi', 3)");
			statements[5].executeUpdate("INSERT INTO Company " + "VALUES ('C106', 'tai', 4)");
			statements[6].executeUpdate("INSERT INTO Company " + "VALUES ('C107', 'milsoft', 2)");
			//Insert into Student
			statements[7].executeUpdate("INSERT INTO Student " + "VALUES ('22000001', 'Ayse', '1997-05-03', 'Ankara', 'senior', 2.75)");
			statements[8].executeUpdate("INSERT INTO Student " + "VALUES ('22000002', 'Ali', '1999-11-12', 'Istanbul', 'junior', 3.44)");
			statements[9].executeUpdate("INSERT INTO Student " + "VALUES ('22000003', 'Veli', '2000-06-22', 'Istanbul', 'freshman', 2.36)");
			statements[10].executeUpdate("INSERT INTO Student " + "VALUES ('22000004', 'John', '2001-03-15', 'Chicago', 'freshman', 2.55)");
			
			//Insert into Apply
			statements[11].executeUpdate("INSERT INTO Apply " + "VALUES ('22000001', 'C101')");
			statements[12].executeUpdate("INSERT INTO Apply " + "VALUES ('22000001', 'C102')");
			statements[13].executeUpdate("INSERT INTO Apply " + "VALUES ('22000001', 'C103')");
			statements[14].executeUpdate("INSERT INTO Apply " + "VALUES ('22000002', 'C101')");
			statements[15].executeUpdate("INSERT INTO Apply " + "VALUES ('22000002', 'C105')");
			statements[16].executeUpdate("INSERT INTO Apply " + "VALUES ('22000003', 'C104')");
			statements[17].executeUpdate("INSERT INTO Apply " + "VALUES ('22000003', 'C105')");
			statements[18].executeUpdate("INSERT INTO Apply " + "VALUES ('22000004', 'C107')");
			
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} 

		

	}

}

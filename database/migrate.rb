#!/usr/bin/ruby
require "mysql"

begin
  # connect to the MySQL server
  dbh = Mysql.real_connect("localhost", "webuser", "web123", "webdb")
  
  # get server version string and display it
  puts "Starting migration..."
  
  dbh.query("DROP TABLE IF EXISTS user_access")
  dbh.query("CREATE TABLE user_access
              (
                user_id   varchar(255) not null,
                user_pass varchar(255) not null,
                user_session_uuid varchar(40)
              )
            ")
  dbh.query("INSERT INTO user_access(user_id, user_pass) values('root', 'abc123')")
  
  rescue Mysql::Error => e
    puts "Error code: #{e.errno}"
    puts "Error message: #{e.error}"
    puts "Error SQLSTATE: #{e.sqlstate}" if e.respond_to?("sqlstate")
  ensure
    # disconnect from server
    puts "Migration successful!"
    dbh.close if dbh
end
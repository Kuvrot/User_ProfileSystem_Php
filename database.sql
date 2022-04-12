use `users_test`;

CREATE TABLE Users(
		
        id int auto_increment,
        m_username varchar(10),
        m_password varchar (20),
        m_email varchar(30),
        m_description varchar(255),
        primary key(id)
        
);

INSERT INTO Users (m_username , m_password , m_email, m_description) VALUES ("admin" , "123456789" , "john@doe.com" , "Soy el admin");

Select * from Users;

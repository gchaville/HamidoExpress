create table User 
        (Username   char(15)      primary key,
         First_name char(15)      not null,
         Date_of_birth  DATE      not null,
         Address     char(32)      not null,
         Mail       char(32)      not null,
         Phone      number(12)     not null),
         Password   char(15)       not null);
create table Itinerary
        (Id         id            primary key,
         Departure  char(15)      not null,
         Arrival    char(15)      not null,
         Price      number(3)     not null);
create table Travel
        (Id         id            primary key,
         Date_Departure  DATE     not null,
	    Driver_user   char(15)      not null 
			references Driver (Username),
	    Pref   char(15)      not null 
			references Preferences (Username),
	    Itin   id            not null 
			references Itinerary (Id),
         Nb_passenger    char(15)      not null);
create table Driver
        (Username   char(15)      not null 
			references User (Username),
         Driving_Year    number(20)	  not null,
         Nb_passenger_total number(2)	  not null);
create table Preferences
        (Username   char(15)      not null 
			references Driver     (Username),
         Smoking    bool	  not null,
         Air_Conditioning    bool	  not null,
         Large_suicase    bool	  not null,
         Animals    bool	  not null);

-- Create unitowner table
CREATE TABLE unitowner (
    unitowner_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    owner_name VARCHAR(255) NOT NULL,
    contact VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Create unit table
CREATE TABLE unit (
    unitid INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    unitowner_id INT NOT NULL,
    unitnumber CHAR(10) NOT NULL,
    unitdescription TEXT NOT NULL,
    price DECIMAL(10, 4) NOT NULL,
    unit_availability BOOLEAN NOT NULL CHECK (unit_availability IN (TRUE, FALSE)),
    FOREIGN KEY (unitowner_id) REFERENCES unitowner (unitowner_id)
);

-- Add unique constraint on (unitowner_id, unitnumber)
ALTER TABLE unit ADD UNIQUE INDEX idx_unit_unitnumber (unitowner_id, unitnumber);

-- Index on unitowner_id
CREATE INDEX idx_unit_unitowner_id ON unit (unitowner_id);

-- Optional: Normalized unitowner details table
CREATE TABLE unitowner_details (
    unitowner_id INT PRIMARY KEY,
    unit_address VARCHAR(255),
    phone_number VARCHAR(20),
    email VARCHAR(255)
);

-- Set up foreign key from unitowner to unitowner_details
ALTER TABLE unitowner ADD FOREIGN KEY (unitowner_id) REFERENCES unitowner_details (unitowner_id);

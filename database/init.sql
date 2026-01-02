-- ===================================
-- SCRIPT DE INICIALIZACIÓN
-- Base de datos: academia_ia
-- ===================================

-- Seleccionar la base de datos
USE academia_ia;

-- Crear tabla de contactos/inscripciones
CREATE TABLE IF NOT EXISTS contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    student_age TINYINT NOT NULL CHECK (student_age BETWEEN 10 AND 16),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    status ENUM('pending', 'contacted', 'enrolled', 'rejected') DEFAULT 'pending',
    notes TEXT,

    -- Índices para búsqueda rápida
    INDEX idx_email (email),
    INDEX idx_created_at (created_at),
    INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertar datos de prueba (opcional - comentar en producción)
-- INSERT INTO contacts (parent_name, email, phone, student_name, student_age, message, status)
-- VALUES
--     ('María García', 'maria.garcia@example.com', '+34 600 111 222', 'Juan García', 12, 'Interesada en el programa completo', 'pending'),
--     ('Pedro López', 'pedro.lopez@example.com', '+34 600 333 444', 'Ana López', 14, 'Quiere información sobre NotebookLM', 'contacted'),
--     ('Laura Martínez', 'laura.martinez@example.com', '+34 600 555 666', 'Carlos Martínez', 10, 'Primer contacto', 'pending');

-- Crear vista para estadísticas
CREATE OR REPLACE VIEW contact_stats AS
SELECT
    COUNT(*) AS total_contacts,
    COUNT(CASE WHEN status = 'pending' THEN 1 END) AS pending,
    COUNT(CASE WHEN status = 'contacted' THEN 1 END) AS contacted,
    COUNT(CASE WHEN status = 'enrolled' THEN 1 END) AS enrolled,
    COUNT(CASE WHEN status = 'rejected' THEN 1 END) AS rejected,
    MIN(created_at) AS first_contact,
    MAX(created_at) AS last_contact
FROM contacts;

-- Crear procedimiento almacenado para obtener contactos recientes
DELIMITER //

CREATE PROCEDURE GetRecentContacts(IN days INT)
BEGIN
    SELECT *
    FROM contacts
    WHERE created_at >= DATE_SUB(NOW(), INTERVAL days DAY)
    ORDER BY created_at DESC;
END //

DELIMITER ;

-- Verificación: Mostrar estructura de la tabla
DESCRIBE contacts;

-- Verificación: Mostrar estadísticas iniciales
SELECT * FROM contact_stats;

-- Mensaje de confirmación
SELECT 'Base de datos inicializada correctamente ✓' AS Status;

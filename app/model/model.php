<?php

require_once 'config.php';

abstract class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
                
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->deploy();
        }

        private function deploy() {
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll();
            if(count($tables) == 0) {
                $sql =<<<END
                    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
                    START TRANSACTION;
                    SET time_zone = "+00:00";


                    /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
                    /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
                    /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
                    /*!40101 SET NAMES utf8mb4 */;

                    --
                    -- Base de datos: `zapas`
                    --

                    -- --------------------------------------------------------

                    --
                    -- Estructura de tabla para la tabla `marca`
                    --

                    CREATE TABLE `marca` (
                    `id` int(11) NOT NULL,
                    `nombre` varchar(45) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                    --
                    -- Volcado de datos para la tabla `marca`
                    --

                    INSERT INTO `marca` (`id`, `nombre`) VALUES
                    (1, 'Nike'),
                    (2, 'Adidas');

                    -- --------------------------------------------------------

                    --
                    -- Estructura de tabla para la tabla `producto`
                    --

                    CREATE TABLE `producto` (
                    `id_producto` int(11) NOT NULL,
                    `nombre` varchar(45) NOT NULL,
                    `precio` int(11) NOT NULL,
                    `talle` int(11) NOT NULL,
                    `imagen` varchar(100) NOT NULL,
                    `id_marca` int(11) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                    -- --------------------------------------------------------

                    --
                    -- Estructura de tabla para la tabla `usuario`
                    --

                    CREATE TABLE `usuario` (
                    `id_usuario` int(11) NOT NULL,
                    `nombre` varchar(100) NOT NULL,
                    `mail` varchar(100) NOT NULL,
                    `contraseña` varchar(50) NOT NULL,
                    `imagen_usuario` varchar(100) NOT NULL
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

                    --
                    -- Índices para tablas volcadas
                    --

                    --
                    -- Indices de la tabla `marca`
                    --
                    ALTER TABLE `marca`
                    ADD PRIMARY KEY (`id`);

                    --
                    -- Indices de la tabla `producto`
                    --
                    ALTER TABLE `producto`
                    ADD PRIMARY KEY (`id_producto`),
                    ADD UNIQUE KEY `fk` (`id_marca`);

                    --
                    -- Indices de la tabla `usuario`
                    --
                    ALTER TABLE `usuario`
                    ADD PRIMARY KEY (`id_usuario`);

                    --
                    -- AUTO_INCREMENT de las tablas volcadas
                    --

                    --
                    -- AUTO_INCREMENT de la tabla `marca`
                    --
                    ALTER TABLE `marca`
                    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

                    --
                    -- AUTO_INCREMENT de la tabla `producto`
                    --
                    ALTER TABLE `producto`
                    MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

                    --
                    -- AUTO_INCREMENT de la tabla `usuario`
                    --
                    ALTER TABLE `usuario`
                    MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

                    --
                    -- Restricciones para tablas volcadas
                    --

                    --
                    -- Filtros para la tabla `producto`
                    --
                    ALTER TABLE `producto`
                    ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
                    COMMIT;

                    /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
                    /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
                    /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



                END;
                $this->db->query($sql);
              }
              
          }
      }
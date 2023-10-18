<?php
    class Model {
        protected $db;

        function __construct() {
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
            $this->deploy();
        }

        function deploy() {
            // Chequear si hay tablas
            $query = $this->db->query('SHOW TABLES');
            $tables = $query->fetchAll(); // Nos devuelve todas las tablas de la db
            if(count($tables)==0) {
                // Si no hay crearlas
                $sql = <<<END
                --
                -- Estructura de tabla para la tabla `categorias`
                --

                CREATE TABLE `categorias` (
                `id_categoria` int(11) NOT NULL,
                `nombre` varchar(45) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `categorias`
                --

                INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
                (1, 'elaborado'),
                (2, 'material');

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `lista`
                --

                CREATE TABLE `lista` (
                `id_producto` int(11) NOT NULL,
                `puntaje` int(11) NOT NULL,
                `dni` int(11) NOT NULL,
                `id_lista` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `lista`
                --

                INSERT INTO `lista` (`id_producto`, `puntaje`, `dni`, `id_lista`) VALUES
                (4, 5, 43907171, 1),
                (3, 3, 43907171, 2),
                (2, 3, 43907171, 3),
                (1, 3, 43907172, 4);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `productos`
                --

                CREATE TABLE `productos` (
                `nombre` varchar(45) NOT NULL,
                `id_categoria` int(11) NOT NULL,
                `id_producto` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `productos`
                --

                INSERT INTO `productos` (`nombre`, `id_categoria`, `id_producto`) VALUES
                ('filamento', 2, 1),
                ('filamento reforzado', 2, 2),
                ('maceta', 1, 3),
                ('cuchillo', 1, 4);

                -- --------------------------------------------------------

                --
                -- Estructura de tabla para la tabla `usuarios`
                --

                CREATE TABLE `usuarios` (
                `nombre` varchar(45) NOT NULL,
                `email` varchar(45) NOT NULL,
                `contrasenia` varchar(200) NOT NULL,
                `dni` int(15) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

                --
                -- Volcado de datos para la tabla `usuarios`
                --

                INSERT INTO `usuarios` (`nombre`, `email`, `contrasenia`, `dni`) VALUES
                ('webadmin', 'webadmin@outlook.com', '$2a$12$s.9G/HImrc3kbYiC6J3OGOC693ItBwj83fr4gR7q7PM8vYRjCwJDu', 1);

                --
                -- Índices para tablas volcadas
                --

                --
                -- Indices de la tabla `categorias`
                --
                ALTER TABLE `categorias`
                ADD PRIMARY KEY (`id_categoria`);

                --
                -- Indices de la tabla `lista`
                --
                ALTER TABLE `lista`
                ADD PRIMARY KEY (`id_lista`),
                ADD KEY `dni` (`dni`),
                ADD KEY `id_producto` (`id_producto`);

                --
                -- Indices de la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD PRIMARY KEY (`id_producto`),
                ADD UNIQUE KEY `nombre` (`nombre`),
                ADD KEY `id_categoria` (`id_categoria`);

                --
                -- Indices de la tabla `usuarios`
                --
                ALTER TABLE `usuarios`
                ADD PRIMARY KEY (`dni`),
                ADD UNIQUE KEY `email` (`email`);

                --
                -- AUTO_INCREMENT de las tablas volcadas
                --

                --
                -- AUTO_INCREMENT de la tabla `categorias`
                --
                ALTER TABLE `categorias`
                MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

                --
                -- AUTO_INCREMENT de la tabla `lista`
                --
                ALTER TABLE `lista`
                MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

                --
                -- AUTO_INCREMENT de la tabla `productos`
                --
                ALTER TABLE `productos`
                MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

                --
                -- Restricciones para tablas volcadas
                --

                --
                -- Filtros para la tabla `lista`
                --
                ALTER TABLE `lista`
                ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuarios` (`dni`),
                ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

                --
                -- Filtros para la tabla `productos`
                --
                ALTER TABLE `productos`
                ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
                COMMIT;
                END;
                $this->db->query($sql);
                }
        }
    }
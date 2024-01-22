SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `Kod` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`Kod`, `username`, `password`, `status`) VALUES
(1, 'testyonetici', '$2y$10$wpMZbTk3voIWZqj3/mjzLOuKyWn42QgrKcDd5AtmmqKOAR9/9RQLe', 'A');

ALTER TABLE `users`
  ADD PRIMARY KEY (`Kod`);

ALTER TABLE `users`
  MODIFY `Kod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
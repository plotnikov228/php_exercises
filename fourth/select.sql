SELECT TOP 5 sportmans.ФИО FROM Спортсмены sportmans 

LEFT JOIN Соревнования competitions
ON competitions.Спортсмены LIKE CONCAT('%', sportmans.id, '%')

GROUP BY sportmans.ФИО

ORDER BY COUNT(competitions.Спортсмены) DESC;

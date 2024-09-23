<?php
// Gets users details from the db
function getUser($user_id, $pdo)
{
        $sql = "SELECT * FROM `users` WHERE `user_id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
}

// Gets budgets from the db

function getBudget($user_id, $pdo)
{
        $sql = "SELECT * FROM `budgets` WHERE `user_id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id]);

        $budget = $stmt->fetchAll(PDO::FETCH_NAMED);

        return $budget;
}
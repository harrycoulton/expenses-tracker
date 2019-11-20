<?php


namespace Example\Models;


class ExpenseModel
{
    private $db;

    /**
     * ExpenseModel constructor.
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Gets the Expenses from the database
     * @return mixed
     */
    public function getExpenses()
    {
        $query = $this->db->query('SELECT `id`, `expense-name`, `expense-value`, `date`, `category` FROM  `expenses` ORDER BY `date`');
        $expenses = $query->fetchAll();
        return $expenses;
    }

    /**
     * Puts the new posted Expense into the database
     * @param $formData
     */
    public function createExpense($formData)
    {
        $query = $this->db->prepare("INSERT INTO `expenses` (`expense-name`, `expense-value`, `date`, `category`) VALUES (:expenseName, :expenseValue, :dateof, :category)");
        $query->execute(['expenseName' => $formData['expense-name'], 'expenseValue' => $formData['expense-value'], 'dateof' => $formData['date'], 'category' => $formData['category']]);
    }

    /**
     * Updates the items in the db with a completed value
     * @param $complete
     */

    public function deleteExpense($formData) {
        $query = $this->db->prepare("DELETE FROM `expenses` WHERE `id` =:ExpenseId");
        $query->execute(['ExpenseId' => $formData]);
    }
}
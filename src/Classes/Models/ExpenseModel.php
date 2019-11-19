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
        $sql = "INSERT INTO `expenses` (`id`, `expense-name`, `expense-value`, `date`, `category`) VALUES (NULL, :expenseName, :expenseValue, :date, :category)";
        $query = $this->db->prepare($sql);
        $query->execute(['expenseName' => $formData['expenseName'], 'expenseValue' => $formData['expenseValue'], 'date' => $formData['date'], 'category' => $formData['category']]);
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
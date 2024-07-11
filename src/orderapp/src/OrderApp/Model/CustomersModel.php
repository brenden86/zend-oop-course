<?php
namespace OrderApp\Model;
use OrderApp\Core\Db\{ModelException, AbstractModel};
use PDO;

/**
 * Customers Db Table Class
 */
class CustomersModel extends AbstractModel
{
    const TABLE = 'customers';

    //Map the properties to the table columns
    protected $id = 'id';
    protected $firstname = 'firstname';
    protected $lastname = 'lastname';

    /**
     * @param int $id
     * @return bool
     */
    public function getCustomer(int $id): array
    {
        //Initialize a statement
        $stmt = null;

        // Build a query
        $query = "SELECT * FROM " . static::TABLE . " WHERE id = ?";

        try{
            $stmt = $this->db->pdo->prepare($query);
            if ($stmt->execute([$id])) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                throw new ModelException('Query error: No customer returned');
            }
        } catch (ModelException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
        }

        //On failure ...
        return false;
    }

    /**
     * @return array|bool
     */
    public function getCustomers(): array
    {
        //Initialize a statement
        $stmt = null;

        // Build a query
        $query = "SELECT id, CONCAT({$this->lastname},', ', {$this->firstname}) AS customer_name " . "FROM " . static::TABLE . " ORDER BY {$this->lastname}";

        try {
            if ($stmt = $this->db->pdo->query($query)) {

                // Provide empty array to hold the results
                $customers = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Fetch row content
                    $customers[] = $row; // Populate the customers array
                }
                if (!empty($customers)) {
                    return $customers;
                }

                //If we haven't returned anything by now, return false
                return false;
            } else {
                throw new ModelException('Query error');
            }
        } catch (ModelException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
        } catch (PDOException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, '/some/other/error.log');
        }
    }
}

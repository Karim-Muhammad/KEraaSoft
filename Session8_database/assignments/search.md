A **Trigger**

- is implicitly invoked whenever any event such as INSERT, DELETE, or UPDATE occurs in a TABLE.
- Only nesting of triggers can be achieved in a table. We _cannot_ **define/call a trigger inside another trigger**.
- In a database, the syntax to define a trigger: CREATE TRIGGER TRIGGER_NAME

A **Procedure**

- explicitly called by the user/application using statements or commands such as exec, EXECUTE, or simply procedure name
- We can define/call procedures inside another procedure.
- In a database, the syntax to define a procedure: CREATE PROCEDURE PROCEDURE_NAME

---

1. **Procedures**: A procedure is a combination of SQL statements written to perform specified tasks. It helps in code re-usability and saves time and lines of code.

#### Advantages of Procedures:

- A Stored Procedure can be used as modular programming, which means that it can be created once, stored, and called multiple times as needed. This allows for speedier execution.
- Reduces network traffic

---

2. Triggers: A trigger is a special kind of procedure that executes only when some triggering event such as INSERT, UPDATE, or DELETE operations occur in a table.

Advantages of Triggers:

- Protection of data
- Inhibits transactions that are not valid
- It also keeps the different tables in sync.

Source: https://www.geeksforgeeks.org/difference-between-trigger-and-procedure-in-dbms/ 😂

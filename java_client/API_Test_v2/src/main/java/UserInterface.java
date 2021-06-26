import java.util.Scanner;

public class UserInterface {
    private static void menu () {
        System.out.println("Select the function you would like to test.");
        System.out.println("Press 1 for to test a an API with 1 inputs.");
        System.out.println("Press 2 for to test a an API with 2 inputs.");
        System.out.println("Press 3 for to test a an API with 3 inputs.");
    }

    private static boolean validateInput(String input) {
        int numberInput;
        try {
            numberInput = Integer.parseInt(input);
        } catch (Exception e) {
//            System.out.println("Invalid input. Please try again.");
            return false;
        }
        //valid range 1-3 inclusive
        return numberInput < 4 && numberInput > 0;
    }

    public int runMenu() {
        Scanner scanner = new Scanner(System.in);
        String choice = null;
        while (validateInput(choice) == false) {
            menu();
            choice = scanner.nextLine();
        }
        return Integer.parseInt(choice);
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        String choice = null;
        while (validateInput(choice) == false) {
            menu();
            choice = scanner.nextLine();
        }
        System.out.printf("User selected %s", choice);
    }
}

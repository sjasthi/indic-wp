import com.sun.jersey.api.client.Client;
import com.sun.jersey.api.client.WebResource;

import java.io.IOException;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

public class Main {
    public static String method = null;
    public static String string = null;
    public static String apiArg2 = null;
    public static String apiArg3 = null;
    public static String name2 = null;
    public static String name3 = null;

    public void getAPIMethod (Scanner scanner) {
        System.out.println("Enter the method you would like to call.");
        method = scanner.nextLine();
    }

    public void getAPIArgs (int choice, Scanner scanner) {
        if (choice == 1) {
            System.out.println("Enter the string.");
            string = scanner.nextLine();
        } else if (choice == 2) {
            System.out.println("Enter the string.");
            string = scanner.nextLine();
            System.out.println("Enter input 2 name.");
            name2 = scanner.nextLine();
            System.out.println("Enter input 2 value.");
            apiArg2 = scanner.nextLine();
        } else if (choice == 3) {
            System.out.println("Enter the string.");
            string = scanner.nextLine();
            System.out.println("Enter input 2 name.");
            name2 = scanner.nextLine();
            System.out.println("Enter input 2 value.");
            apiArg2 = scanner.nextLine();
            System.out.println("Enter input 3 name.");
            name3 = scanner.nextLine();
            System.out.println("Enter input 3 value.");
            apiArg3 = scanner.nextLine();
        }
    }

    public static void main(String[] args) throws IOException {
        Main main = new Main();
        UserInterface ui = new UserInterface();
        Scanner scanner = new Scanner(System.in);

        //starting the ui
        int userInput = ui.runMenu();
        //getting desired method and appropriate args for method
        main.getAPIMethod(scanner);
        main.getAPIArgs(userInput, scanner);


        //https://www.baeldung.com/java-http-request
        Map<String, String> parameters = new HashMap<>();

        parameters.put("language", "english");

        if (userInput == 1) {
            parameters.put("string", string);
        } else if (userInput == 2) {
            parameters.put("string", string);
            parameters.put(name2, apiArg2);
        } else if (userInput == 3) {
            parameters.put("string", string);
            parameters.put(name2, apiArg2);
            parameters.put(name3, apiArg3);
        }

        String baseURL = "http://localhost/indic-wp/api/";

        baseURL += method + ".php?";

        //building the url with parameters
        int count = 0;
        for(Map.Entry<String, String> param : parameters.entrySet()) {
            count++;
            String key = param.getKey();
            String value = param.getValue();

            if (count < parameters.size()) {
                baseURL += key + "=" + value + "&";
            } else {
                baseURL += key + "=" + value;
            }
        }

        System.out.println(baseURL);

        Client client = Client.create();
        WebResource resource = client.resource(baseURL);
        String response = resource.get(String.class);
        System.out.println(response);
    }
}

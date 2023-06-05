import os

def write_filenames_to_file(directory_path):

    filenames = os.listdir(directory_path)

    file_path = os.path.join(directory_path, 'file.txt')

    with open(file_path, 'a') as file:
        for filename in filenames:
            file.write(filename + '\n')

    print(f"File.txt created in {directory_path} with the list of filenames.")

directory_path = '/Users/giulio/Mio_Computer/NewtoNetwork/script'
write_filenames_to_file(directory_path)